# App overview

## Planning steps

* [x] Come up with an idea / problem to solve
* [x] Create design / sketch
* [x] Plan data models, data you'll work with
* [x] Plan endpoints (API, backend)
* [x] Plan routes (SPA, frontend)

---

## Gegeral Idea

* Create an app, that lets managers to add, edit and remove tasks for users and store tasks in the projects, give them due date, title, description and attach files. 
* App also provide administration functional for only technical administrators, where they can add, edit and remove administrators, managers and users of this app.
* Users can see all the tasks attached for them and complete them
* Authentication and Authorization

## Design

[Figma Design](https://www.figma.com/file/0votXC43Q5KC5scZjQZ40S/Taskii?node-id=0%3A1)

## Data models

| User     | === | Project | === | Task        |
| -------- | --- | ------- | --- | ----------- |
| ID       | === | ID      | === | ID          |
| Email    | === | Title   | === | Project ID  |
| Name     | === |         | === | Title       |
| Surname  | === |         | === | Description |
| Password | === |         | === | Asignee     |
| Role     | === |         | === | Due Date    |
|          | === |         | === | Files[]     |

## API Endpoints

### Users

> /api/users/..

**GET ../**<br>
Retrieve list of all users

**POST ../signup**<br>
Create new user + log user in

**POST ../login**<br>
Log user in

### Projects

> /api/projects/..

**GET ../**<br>
Retrieve list of all projects

**GET ../:pid**<br>
Retrieve project with id (pid)

**POST ../**<br>
Create new project

**PATCH ../:pid**<br>
Update project with id (pid)

**DELETE ../:pid**<br>
Delete project with id (pid)

### Tasks

> /api/tasks/..

**GET ../user/:uid**<br>
Retrieve list of all tasks for the user by id (uid)

**GET ../project/:pid**<br>
Retrieve list of all tasks for the project by id (pid)

**GET ../:tid**<br>
Retrieve task with id (tid)

**POST ../**<br>
Create new task

**PATCH ../:tid**<br>
Update task with id (tid)

**DELETE ../:tid**<br>
Delete task with id (tid)

## SPA Routes

| Route            | View                     | User Role         |
| ---------------- | ------------------------ | ----------------- |
| /                | Log in                   | Not Authenticated |
| /users           | List of users            | Administrator     |
| /users/add       | Add user                 | Administrator     |
| /users/:uid      | Update user              | Administrator     |
| /projects        | List of projects         | Manager           |
| /projects/new    | Add project              | Manager           |
| /projects/:pid   | Edit project             | Manager           |
| /:pid/tasks      | List of tasks by project | Manager           |
| /:pid/tasks/new  | New task                 | Manager           |
| /:pid/tasks/:tid | Update task              | Manager           |
| /:uid/tasks      | List of Tasks by user    | User              |
| /tasks/:tid      | Task view                | User              |