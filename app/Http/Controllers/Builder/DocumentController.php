<?php

namespace App\Http\Controllers\Builder;


use App\Http\Controllers\Controller;
use App\Http\Requests\Document\AddRequest;
use App\Http\Traits\ResponseTraits;
use App\Models\Lands\Document;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DocumentController extends Controller
{
    use ResponseTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document = Document::paginate(10);
        return view('Projects.Document.index', compact('document'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Projects.Document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {

        try {
            $docu = new Document();
            $identity = decrypt(session()->get('roleIdentity'));
            $docu->docu_name = $request->docuname;
            $docu->description = $request->description;
            $documents = array();
            if ($request->hasFile('documents')) {
                
                foreach ($request->documents as $doc) {
                    $imageName = rand(111, 999) . time() . '.' . $doc->extension();
                    $doc->move(public_path('uploads/document'), $imageName);

                    $documents[] .= $imageName;
                    
                }
                $docu->doc_attachment =  json_encode($documents);

            }
            else{
                return redirect()->back()->with($this->resMessageHtml(false, 'error', 'Document created unsuccessfully'));
            }

            $docu->created_by = Crypt::decrypt(session()->get('userId'));
            $docu->status = 1;
            $docu->project_id = Crypt::decrypt($request->project_id);
            if ($docu->save()) {
                return redirect($identity . '/document')->with($this->resMessageHtml(true, false, 'Document created successfully'));
            }
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with($this->resMessage(false, 'error', 'Cannot create document'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Land\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Land\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {

        return view('Projects.Document.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Land\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        try {
            $identity = decrypt(session()->get('roleIdentity'));
            $docu = $document;
            $docu->docu_name = $request->docuname;
            $docu->description = $request->description;

            if ($request->hasfile('docufile')) {
                $imageName = rand(111, 999) . time() . '.' . $request->docufile->extension();
                $request->docufile->move(public_path('uploads/document'), $imageName);
                $docu->doc_attachment = $imageName;
            }
            $docu->status = 1;
            if ($docu->save()) {
                return redirect($identity . '/document')->with('success', 'Data saved');
            }
        } catch (Exception $e) {
            dd($e);
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Land\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->back();
    }
}
