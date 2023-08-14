<?php

namespace App\Controllers;

class Pages extends BaseController
{
    
    public function view($page,$id = null)
    {
        // if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
        //     throw new PageNotFoundException($page);
        // }
 

        if($page=="home" || $page==''){
            $newsmodel = model(NewsModel::class);

        $data = [
            'news'  => $newsmodel->getNews(),
        ];
        return view('bootstrapLinks').view('navbar').view('pages/home',$data);
        }

        if ($page == "news" && $id !== null) {
            $newsmodel = model(NewsModel::class);
            $data = [
                'news' => $newsmodel->getNewsById($id),
            ];
            return view('bootstrapLinks') .view('navbar'). view('templates/newsPageTemplate', $data);
        }
        // else{
        //     $data = [
        //         'title'  => $page,
        //     ];
        //     return view('bootstrapLinks').view('pages/blank',$data);
        // }
        // $data['title'] = ucfirst($page);  Capitalize the first letter

        // return view('templates/header', $data)
        //     . view('pages/' . $page)
        //     . view('templates/footer');
    }
}
