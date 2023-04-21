# ForumPlatformDDD

A forum platform that allows users to create threads, post replies, and engage in discussions. Implement features such as user authentication, moderation tools, and search functionality.

This is a forum platform where users can create threads, post replies, and engage in discussions.

## Features

- User authentication
- Create, edit, and delete threads
- Post replies to threads
- Upvote and downvote threads and replies
- Moderation tools for administrators to manage threads and replies
- Search functionality to find threads and replies

## API Routes

### Authentication

- `POST /api/register`: Register a new user
- `POST /api/login`: Login a user
- `POST /api/logout`: Logout a user

### Threads

- `GET /api/threads`: Get a list of all threads
- `GET /api/threads/{id}`: Get a specific thread by ID
- `POST /api/threads`: Create a new thread
- `PUT /api/threads/{id}`: Update an existing thread
- `DELETE /api/threads/{id}`: Delete an existing thread

### Replies

- `GET /api/threads/{thread_id}/replies`: Get a list of all replies for a specific thread
- `GET /api/threads/{thread_id}/replies/{id}`: Get a specific reply by ID for a specific thread
- `POST /api/threads/{thread_id}/replies`: Create a new reply for a specific thread
- `PUT /api/threads/{thread_id}/replies/{id}`: Update an existing reply for a specific thread
- `DELETE /api/threads/{thread_id}/replies/{id}`: Delete an existing reply for a specific thread

### Moderation

- `GET /api/moderators`: Get a list of all moderators
- `POST /api/moderators`: Add a new moderator
- `DELETE /api/moderators/{user_id}`: Remove an existing moderator

### Search

- GET /api/search?q={query}`: Search for threads and replies by keyword

Note: This is just an example list of API routes, and you may need to modify it based on the specific requirements.

## Database Schema

### Users

- `id`: int (primary key)
- `name`: varchar(255)
- `email`: varchar(255)
- `password`: varchar(255)
- `created_at`: timestamp
- `updated_at`: timestamp

### Threads

- `id`: int (primary key)
- `user_id`: int (foreign key to Users table)
- `title`: varchar(255)
- `body`: text
- `upvotes`: int
- `downvotes`: int
- `created_at`: timestamp
- `updated_at`: timestamp

### Replies

- `id`: int (primary key)
- `user_id`: int (foreign key to Users table)
- `thread_id`: int (foreign key to Threads table)
- `body`: text
- `upvotes`: int
- `downvotes`: int
- `created_at`: timestamp
- `updated_at`: timestamp

### Moderators

- `user_id`: int (foreign key to Users table)
- `created_at`: timestamp
- `updated_at`: timestamp

Note: This is just an example schema, and you may need to modify it based on the specific requirements.

## Authors

- ...
- Max Base

Copyright 2023, Max Base
