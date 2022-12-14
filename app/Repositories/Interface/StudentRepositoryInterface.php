<?php

namespace App\Repositories\Interface;

interface StudentRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);

    public function show($student);

    public function edit($student);

    public function update($request, $student);

    public function delete($student);

    public function forceDelete($student);
}