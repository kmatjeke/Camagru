# Camagru

Creating a website simply emulating instagram.

## How to setup the project and run the project

### 1. Install XAMPP

Xampp is the core of this project. XAMPP is an abbreviation for cross-platform, Apache, MySQL, PHP and Perl, and it allows you to build websites offline, on a local web server on your computer. This simple and lightweight solution works on Windows, Linux, and Mac – hence the “cross-platform” part.

Once installed you need to setup your MySQL credentials to use the default account,which is: username = root. password = '';

### 2. Clone project into the XAMPP htdocs folder

which is usually in;

```address

C:\xampp\htdocs

```

### Steps to run the project

Now that you have installed xampp and cloned the project. There's a few steps you need to do in order to run the project.

First

```statement

Open xampp and run the apache and mysql servers.

```

Second

```statement

Run config/setup.php in order to create your camagru database and all of it's needed tables.

```

Third

```statement

run index.php to start the application.

```

## Programme features

1. Create a new account and get a verification email, must be unable to login without verifying account.

2. Must be able to get a password re-initialization email in case of a forgotten password.

3. Login to account with credentials.

4. Must be able to modify basic information such as email, username, password. And must be able to subscribe to get notification emails.

5. Must be able to login as guest. But can only view other users pictures in the gallery.

6. Must be able to comment and like other users pictures when logged in. When subscribed to notifications, must be able to get emails when someone has liked or commented on your picture.

7. gallery showing other user's pictures must be paginated.

8. Must be able to take using the webcam or upload from local drive a photo, then edit that photo with stickers or frames. Must then be able to submit that photo to your gallery and timeline.

## programme architecture

The programme uses a loose MVC architecture. The user interacts with a user-interface and sends commands to the controller which executes these commands and when needed makes use of the database. The controller can take data from the databse and display it to the user-interface.

UI(front-end) -> controller(back-end)   -> Database
Database      -> controller(back-end)   -> UI(front-end)

## Testing

The testing was non-automated. Meaning the app was actually used and I noted down how it behaved, and that every function worked as it was supposed to.
These are all user expectations tests. For in depth-testing I used the official marksheet.

Testing database            ->  The camagru database is created and all of it's tables
Testing webserver           ->  web-server starts with no errors. going to <localhost:8080> takes you to login page
Testing account creation    ->  Able to create account. Also receiving verification email.
Testing log in              ->  Able to log in to app. should take you to home page <localhost:8080/home.php>
Testing changing credentials->  Able to change username,email and password.And subscribe to notifications
Testing Picture taking/uploading and editing with webcam
                        ->
Able to capture with webcam or upload and edit picture.
Testing gallery functions   ->  Able to view gallery and like/comment on pictures
Testing log out             ->  Able to log out of app.
