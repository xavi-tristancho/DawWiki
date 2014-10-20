<?php

use DawWiki\Activities\Activity;
use DawWiki\Topics\Topic;
use DawWiki\Activities\ActivityTransformer;
use League\Fractal\Manager;

class ActivitiesController extends ApiController {

    public function __construct()
    {
        parent::__construct(new Manager);
        //Limit the users who can do more than read operations
        $this->beforeFilter('auth');
        $this->beforeFilter('role:admin', ['on' => ['post', 'put', 'patch', 'delete']]);
    }

    /**
     * Display a listing of the resource.
     * GET /Activities
     *
     * @return Response
     */
    public function index()
    {
        $activities = Activity::all();

        return $this->respondWithCollection($activities, new ActivityTransformer);
    }

    public function store(){

        $inputs = Input::all();

        if($inputs['title'] != '' and $inputs['statement'] != '')
        {

            $name = ucfirst(str_replace('-', ' ', $inputs['topic']));

            $topic = Topic::where('name', '=', $name)->get()->first();

            return Activity::create([

                'topic_id'  => $topic->id,
                'title'     => $inputs['title'],
                'statement' => $inputs['statement']
            ]);
        }

        return $this->errorWrongArgs();

    }

    public function show($id){

        $activity = Activity::find($id);

        return $this->respondWithItem($activity, new ActivityTransformer);;
    }

    public function update($id){

        $activity = Activity::find($id);
        $inputs = Input::all();

        $activity->topic_id = $inputs['topic_id'];
        $activity->title = $inputs['title'];
        $activity->statement = $inputs['statement'];

        $activity->save();
    }

    public function destroy($id){

        $activity = Activity::destroy($id);
    }
}