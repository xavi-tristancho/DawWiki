<?php

use DawWiki\Activities\Activity;
use DawWiki\Activities\ActivityTransformer;
use League\Fractal\Manager;

class ActivitiesController extends ApiController {

    public function __construct()
    {
        parent::__construct(new Manager);
        //Limit the users who can do more than read operations
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

        return Activity::create($inputs);
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

        return Activity::destroy($id);
    }
}