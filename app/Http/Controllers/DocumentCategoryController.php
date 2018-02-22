<?php

namespace App\Http\Controllers;

use App\DataTables\DocumentCategoryDataTable;
use App\Fontawesome;
use App\Http\Requests;
use App\Http\Requests\CreateDocumentCategoryRequest;
use App\Http\Requests\UpdateDocumentCategoryRequest;
use App\Models\DocumentCategory;
use App\Repositories\DocumentCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DocumentCategoryController extends AppBaseController
{
    /** @var  DocumentCategoryRepository */
    private $documentCategoryRepository;

    public function __construct(DocumentCategoryRepository $documentCategoryRepo)
    {
        $this->documentCategoryRepository = $documentCategoryRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the DocumentCategory.
     *
     * @param DocumentCategoryDataTable $documentCategoryDataTable
     * @return Response
     */
    public function index(DocumentCategoryDataTable $documentCategoryDataTable)
    {
        return $documentCategoryDataTable->render('document_categories.index',[
//            'root_cats'=>DocumentCategory::where('root_category',null)->get(),
//            'icons'=>Fontawesome::all()
        ]);
    }

    /**
     * Show the form for creating a new DocumentCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('document_categories.create');
    }

    /**
     * Store a newly created DocumentCategory in storage.
     *
     * @param CreateDocumentCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateDocumentCategoryRequest $request)
    {
        $input = $request->all();
//        $input['root_category']= ""

        $documentCategory = $this->documentCategoryRepository->create($input);

        Flash::success('Document Category saved successfully.');

        return redirect(route('documentCategories.index'));
    }

    /**
     * Display the specified DocumentCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $documentCategory = $this->documentCategoryRepository->findWithoutFail($id);

       /* if (empty($documentCategory)) {
            Flash::error('Document Category not found');

            return redirect(route('documentCategories.index'));
        }

        return view('document_categories.show')->with('documentCategory', $documentCategory);*/
       return response()->json($documentCategory);
    }

    /**
     * Show the form for editing the specified DocumentCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $documentCategory = $this->documentCategoryRepository->findWithoutFail($id);

        if (empty($documentCategory)) {
            Flash::error('Document Category not found');

            return redirect(route('documentCategories.index'));
        }

        return view('document_categories.edit')->with('documentCategory', $documentCategory);
    }

    /**
     * Update the specified DocumentCategory in storage.
     *
     * @param  int              $id
     * @param UpdateDocumentCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocumentCategoryRequest $request)
    {
        $documentCategory = $this->documentCategoryRepository->findWithoutFail($id);

        if (empty($documentCategory)) {
            Flash::error('Document Category not found');

            return redirect(route('documentCategories.index'));
        }

        $documentCategory = $this->documentCategoryRepository->update($request->all(), $id);

        Flash::success('Document Category updated successfully.');

        return redirect(route('documentCategories.index'));
    }

    /**
     * Remove the specified DocumentCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $documentCategory = $this->documentCategoryRepository->findWithoutFail($id);

        if (empty($documentCategory)) {
            Flash::error('Document Category not found');

            return redirect(route('documentCategories.index'));
        }

        $this->documentCategoryRepository->delete($id);

        Flash::success('Document Category deleted successfully.');

        return redirect(route('documentCategories.index'));
    }
}
