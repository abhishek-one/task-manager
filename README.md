# Task Manager

## Introduction

This is a task management web application built with Laravel. The application allows users to create, edit, delete, and reorder tasks.

## Setup Instructions

**Run the database migrations:**
    php artisan migrate

**Start the development server:**
    php artisan serve

**Open your browser and navigate to:**
    http://127.0.0.1:8000

## Usage

### Creating a Project
Go to http://127.0.0.1:8000/projects/create
Fill in the project name and submit.

### Creating a Task
Go to http://127.0.0.1:8000/tasks/create
Fill in the task name and select the associated project.
Submit the form.

### Editing a Task
Go to http://127.0.0.1:8000/tasks/create
Update the task details and submit the form.

### Deleting a Task
Go to http://127.0.0.1:8000/tasks
Click on "Delete" next to the task you want to delete.

### Reordering Tasks
Go to http://127.0.0.1:8000/tasks
Drag and drop tasks to reorder them.

### Filtering Tasks by Project
Go to http://127.0.0.1:8000/tasks
Select a project from the dropdown menu to filter tasks by the selected project.
