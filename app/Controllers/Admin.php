<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        $model = model(NewsModel::class);

        $data = [
            'news'  => $model->getNews(),
        ];

        return view('bootstrapLinks').view('pages/admin',$data);
    }
    public function edit($id=null){
        $model = model(NewsModel::class);
        $auhtormodel=  model(AuthorsModel::class);
        $data = [
            'news'  => $model->getNewsById($id),
            'authors'  => $auhtormodel->getAuthors(),
        ];
        return view('bootstrapLinks').view('news/edit',$data);
    }

    public function update($id=null){
        $newsmodel = model(NewsModel::class);
        $file= $this->request->getFile('image');
        $fileName ='';
        if ($file->isValid()){
            $fileName = $file->getName(); 
            var_dump($fileName);
            // $file->store();
            $file->move('images');
        }
        

        $data = [
            'title'  => $this->request->getPost('title'),
            'author_id'  => $this->request->getPost('author_id'),
            'description'  => $this->request->getPost('description'),
            'image'  => $fileName,
        ];
        $newsmodel->update($id,$data);
        return redirect()->to('/admin');
    }


    public function delete($id){
        $model = model(NewsModel::class);
        if ($model->find($id) !== null) {
            $model->delete($id);  
            return redirect()->to('/admin');
        } else {
            return redirect()->to('/admin')->with('error', 'News item not found.');
        }
    }

   
    
    public function create(){
        
        $newsmodel = model(NewsModel::class);
        helper('form');

        $auhtormodel=  model(AuthorsModel::class);
        $data = [
            'authors'  => $auhtormodel->getAuthors(),
        ];
        if ( $this->request->is('get')) {
            return view('bootstrapLinks').view('news/create',$data);      
        }
        $post = $this->request->getPost(['title','author_id','description']);
        $file= $this->request->getFile('image');
        $fileName ='';
        if ($file->isValid()){
            $fileName = $file->getName(); 
            var_dump($fileName);
            // $file->store();
            $file->move('images');
        }
        var_dump($post);
        if (! $this->validateData($post, [
            'title' => 'required|max_length[255]|min_length[3]',
            'author_id'  => 'required|max_length[8]|min_length[1]',
            'description'  => 'required|max_length[600]|min_length[1]',
        ])) {
            // The validation fails, so returns the form.
              return view('bootstrapLinks').view('news/create',$data);      
        }

        $model = model(NewsModel::class);
       
   
        $model->save([
            'title' => $post['title'],
            'author_id'  => intval($post['author_id']),
            'image'  => $fileName,
            'description'  => $post['description'],
        ]);

        
    }
}
