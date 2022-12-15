<?php

namespace App\Http\Controllers;

use App\Models\HtmlEditor;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;
use SebastianBergmann\CodeCoverage\Report\PHP as ReportPHP;

class HtmlEditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_files = HtmlEditor::all();
        return $all_files;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'editor_data' => 'required'
        // ]);

        // Check We have data or not
        $editor_data = $request->editor_data;
        if( $editor_data == null ){
                return "Please add some Data to the editor and try again";
        }
        else{
            // Create a file with the given data from Frontend
            // $file_name = strtolower(substr($editor_data , 0 , 20 ));
            $file_name_with_extension = Auth::user()->name . "_" . "file" . "_" . time() . ".html";
            $create_file = fopen($file_name_with_extension, "w");
            fwrite( $create_file , $editor_data );
            fclose($create_file);

            // Check if the file created or not
            if(file($file_name_with_extension)){

                // Store file to Local Storage
                Storage::putFileAs('public/editor_files',$file_name_with_extension , $file_name_with_extension );

                // Store file to database
                $new_file = new HtmlEditor;
                $new_file->file_data = $file_name_with_extension;
                $new_file->user_id = auth()->user()->id;
                $new_file->save();

                return $file_name_with_extension . " saved to database and Local Storage Successfully.";
                // return fread($create_file,filesize($file_name_with_extension));
                // return fopen("newfile.html", "w") or die("Unable to open file!");
            }
            else{
                return " File Does not Exist ";
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file_detail = HtmlEditor::where('id', $id)->first();
        $file_name = $file_detail->file_data;

        return file_get_contents('storage/editor_files/'. $file_name);
        // return view('htmlEditor.preview_template');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file_detail = HtmlEditor::where('id', $id)->first();
        $file_name = $file_detail->file_data;

        return file_get_contents('storage/editor_files/'. $file_name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file_detail = HtmlEditor::where('id', $id)->first();
        $file_name = $file_detail->file_data;
        $editor_data = $request->editor_data;
        file_put_contents('storage/editor_files/' . $file_name , $editor_data);
        return "File Updated Successfully";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file_detail = HtmlEditor::find($id);
        $file_name = $file_detail->file_data;
        Storage::delete('public/editor_files/' . $file_name);
        $file_detail->delete();
        return "File Deleted Successfully";
    }
}
