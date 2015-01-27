<?php
namespace App\Controllers\Backend;
use Auth,BaseController,Form,Input,Redirect,Sentry,View,Notification,Validator;
use Article,ArticleStatus,User,Tags;
class ArticleController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /backend/articlecontrollre
	 *
	 * @return Response
	 */
	public function index()
	{

        return View::make('backend.article.index')->withArticle(
            Article::select('id','cate_id','user_id','title','tags','created_at')
                ->orderBy('id','desc')
                ->paginate(15)
        );

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /backend/articlecontrollre/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return View::make('backend.article.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /backend/articlecontrollre
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $data = [
            'cate_id'=>Input::get('cate_id'),
            'user_id'=>User::getLoginUserId(),
            'title'=>Input::get('title'),
            'content'=>Input::get('content'),
            'tags'=>Tags::SetArticleTags(Input::get('tags')),
            'keyword'=>Input::get('keyword'),
            'desc'=>Input::get('desc'),
        ];

        $validator = Validator::make($data,Article::$rules);

        if($validator->passes()){
            try{

                if($articleId = Article::insertGetId($data)){
                    ArticleStatus::initArticleStatus($articleId);
                    Notification::success('添加成功');
                    return Redirect::route('backend.article.index');
                }

            }catch (\Exception $e){
                return Redirect::back()->withErrors(array('error' => $e->getMessage()))->withInput();
            }
        }

        Notification::error('添加失败');
        return Redirect::back()->withErrors($validator)->withInput();

	}

	/**
	 * Display the specified resource.
	 * GET /backend/articlecontrollre/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
        return Article::select('content')->find($id)->content;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /backend/articlecontrollre/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
        return View::make('backend.article.edit')->withArticle(Article::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /backend/articlecontrollre/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
        $data = [
            'cate_id'=>Input::get('cate_id'),
            'user_id'=>User::getLoginUserId(),
            'title'=>Input::get('title'),
            'content'=>Input::get('content'),
            'tags'=>Tags::SetArticleTags(Input::get('tags')),
            'keyword'=>Input::get('keyword'),
            'desc'=>Input::get('desc'),
        ];

        $validator = Validator::make($data,Article::$rules);

        if($validator->passes()){
            try{

                $affectedRows = Article::where('id', '=', $id)->update($data);

                if($affectedRows){
                    Notification::success('修改成功');
                    return Redirect::route('backend.article.index');
                }

            }catch (\Exception $e){
                return Redirect::back()->withErrors(array('error' => $e->getMessage()))->withInput();
            }
        }

        Notification::error('修改失败');
        return Redirect::back()->withErrors($validator)->withInput();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /backend/articlecontrollre/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        if(Article::destroy($id)){
            Notification::success('删除成功');
            return Redirect::route('backend.article.index');
        }
	}

}