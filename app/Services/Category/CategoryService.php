<?php


namespace App\Services\Category;


use App\Models\Category;
use App\Traits\FormatResponseTrait;
use App\Traits\MediaTrait;
use App\Traits\SearchTrait;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;


class CategoryService
{
    use MediaTrait, FormatResponseTrait, SearchTrait;
    public function data(string $type, $request) :object
    {
        $paginate = $request->has('limit') ? $request->limit : config('setting.LimitPaginate');
        return Category::type($type)
        ->parent()
        ->withCount('childCategories')
        ->with([
            'childCategories' => function($query) {
                $query->withCount('childCategories');
            }
            ,
            'childCategories.childCategories',
        ])
        ->latest()
        ->paginate($paginate)
        ->withQueryString();
    }// End Category With Full nested Of SubCategories

    public function categoriesWithSub(string $type) :object
    {
        return Category::parent()
            ->type($type)
            ->with('childCategories')->latest()->get();

    }// End Categories With Level One Of Nested SubCategories


    Public function storeCategory($type,object $request)
    {
        $category  = Category::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'slug'          => Str::slug($request->slug),
            'status'        => $request->status,
            'parent_id'     => $this->parentId($request),
            'level'         => $this->categoryLevel($request),
            'category_type' => $type,
        ]);

        $this->storeCategoryImage($category,$request);

    }// End StoreCategory

    public function updateCategory(object $request, $category)
    {
        $category->update([
            'name'          => $request->name,
            'description'   => $request->description,
            'slug'          => Str::slug($request->slug),
            'status'        => $request->status,
            'parent_id'     => $this->parentId($request),
            'level'         => $this->categoryLevel($request),
        ]);

        // Check If User Want Change Image Not Keep it
        if ($request->hasFile('image')) {
            // Remove The Old One
            $this->deleteMedia('files', 'categories/' . $request->category_type, $category->image);
            // Then Replace By New Image
           $this->storeCategoryImage($category,$request);
        }
    }// End Update Category


    private function parentId($request)
    {
        if($request->filled('parent_id')) {
            $categoryId = $request->parent_id;
            $category = end($categoryId);
        }else {
            $category = $request->parent_id;
        }

        return $category;
    }// End ParentId


    private function categoryLevel($request): int
    {
        $categoryLevel= $request->filled('parent_id') ? $request->parent_id :  [] ;

        return count($categoryLevel) + 1;
    }// End CategoryLevel

    private function storeCategoryImage($category,$request)
    {
        $category->update([
            'image' => $this->storeMedia($request->image, 'files', 'categories/' . $request->category_type),
        ]);
    }// End StoreCategoryImage

    public function filter(string $type,$request)
    {

        //Paginate
        $paginate = $request->has('limit') ? $request->limit : config('setting.LimitPaginate');
        $categories =  Category::query();

        //Search
        $query =   $this->search($categories,$this->ajaxSearchInputs($request));


        return $categories->type($type)
            ->withCount('childCategories')
            ->with('parentCategory')
            ->latest()
            ->paginate($paginate)
            ->withQueryString();
    }

    public function categories(string $type)
    {
        return Category::select(['id','name'])->parent()->type($type)->get();

    }

    public function subCategories(string $type,$category )
    {
        return Category::select(['id','name'])
            ->type($type)
            ->where('parent_id', $category)
            ->get();

    }

    private function ajaxSearchInputs($request): array
    {
        return [
            // Search In [name,description,Slug]
            ['clause' => 'where','column' => 'name', 'operator' => 'like','request' => '%' . $request->name. '%'],
            ['clause' => 'orWhere','column' => 'description', 'operator' => 'like','request' => '%' . $request->name. '%'],
            ['clause' => 'orWhere','column' => 'slug', 'operator' => 'like','request' => '%' . $request->name. '%'],

            // Search In Level
            ['clause' =>'where','column' => 'level', 'operator' => '=', 'request' => $request->level],

        ];
    }



}
