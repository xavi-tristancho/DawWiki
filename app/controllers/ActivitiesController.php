<?php

use DawWiki\Activities\Activity;

class ActivitiesController extends ApiController {

    /**
     * Display a listing of the resource.
     * GET /Activities
     *
     * @return Response
     */
    public function index()
    {
        $activities = Activity::all();

        return $activities;
    }

    public function store(){

        $inputs = Input::all();

        return Activity::create($inputs);
    }

    public function show($id){

        $activity = Activity::find($id);

        return $activity;
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