# Kindle Devices Management App

This is a Laravel Breeze project designed to manage Kindle devices and their libraries. The application provides functionalities to manage Kindles, their associated books, authors, publishers, bookmarks, highlighted quotes, downloads, and reading progress.

## Features

- Manage Kindle devices
- Manage books and their metadata (title, genre, publication date, etc.)
- Manage authors and publishers
- Track bookmarks and highlighted quotes
- Track downloads and their details
- Track reading progress

## UML Diagram

The following UML diagram provides an overview of the data model and relationships within the application:

![UML Diagram](kindles.png)

## Getting Started

To get started with the project, follow these steps:

### Prerequisites

- PHP >= 8.0
- Composer
- Node.js & npm

### Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/your-username/kindle-management-app.git
    cd kindle-management-app
    ```

2. Install dependencies:
    ```bash
    composer install
    npm install
    ```

3. Copy the `.env.example` file to `.env` and configure your environment variables:
    ```bash
    cp .env.example .env
    ```

4. Generate the application key:
    ```bash
    php artisan key:generate
    ```

5. Run migrations to set up the database:
    ```bash
    php artisan migrate
    ```

6. Start the development server:
    ```bash
    php artisan serve
    ```

## Models and Relationships

The application consists of the following models and their relationships:

- **Authors**
  - `author_id`: STRING
  - `name`: STRING
  - `birthday`: STRING
  - `country`: STRING
  - `contact`: STRING

- **Relationships**
  - `An author can write multiple books, and a book can have multiple authors (Many-to-Many relationship).`

- **Books**
  - `ISBN`: STRING
  - `title`: STRING
  - `genre`: ARRAY
  - `publication_date`: STRING
  - `author_id`: FK
  - `publisher_id`: FK
  - `kindle_id`: FK

  **Relationships**
  - `A book can have multiple authors (Many-to-Many relationship).`
  - `A book is published by one publisher (Books.publisher_id references Publishers.publisher_id).`
  - `A book can have multiple Kindles and a Kindle can have multiple books (Many-to-Many relationship).`
  - `A book can have multiple bookmarks and highlighted quotes (Bookmarks.book_id and HighlightedQuotes.book_id reference Books.ISBN).`
  - `A book can be downloaded by multiple Kindles (Downloads.book_id references Books.ISBN).`
  - `Reading progress is tracked for each book on different Kindles (ReadingProgress.book_id references Books.ISBN).`

- **Publishers**
  - `publisher_id`: STRING
  - `name`: STRING
  - `country`: STRING
  
- **Relationships**
  - `A publisher can publish multiple books (Books.publisher_id references Publishers.publisher_id).`

- **Bookmarks**
  - `bookmark_id`: STRING
  - `page`: ARRAY
  - `book_id`: FK
  - `kindle_id`: FK

- **Relationships**
  - `A bookmark belongs to one book (Bookmarks.book_id references Books.ISBN).`
  - `A bookmark is associated with one Kindle (Bookmarks.kindle_id references Kindles.kindle_id).`

- **Kindles**
  - `kindle_id`: STRING
  - `name`: STRING
  - `type`: STRING
  - `email`: STRING
  - `book_id`: FK

- **Relationships**
  - `A Kindle can have multiple books (Books.kindle_id references Kindles.kindle_id).`
  - `A Kindle can have multiple bookmarks and highlighted quotes (Bookmarks.kindle_id and HighlightedQuotes.kindle_id reference Kindles.kindle_id).`
  - `A Kindle can download multiple books (Downloads.kindle_id references Kindles.kindle_id).`
  - `Reading progress is tracked for multiple books on a Kindle (ReadingProgress.kindle_id references Kindles.kindle_id).`

- **HighlightedQuotes**
  - `quote_id`: STRING
  - `quote_text`: STRING
  - `page`: ARRAY
  - `book_id`: FK
  - `kindle_id`: FK
  
- **Relationships**
  - `A highlighted quote belongs to one book (HighlightedQuotes.book_id references Books.ISBN).`
  - `A highlighted quote is associated with one Kindle (HighlightedQuotes.kindle_id references Kindles.kindle_id).`

- **Downloads**
  - `download_id`: STRING
  - `download_date`: STRING
  - `download_size`: STRING
  - `book_id`: FK
  - `kindle_id`: FK
  
- **Relationships**
  - `A download is associated with one book (Downloads.book_id references Books.ISBN).`
  - `A download is associated with one Kindle (Downloads.kindle_id references Kindles.kindle_id).`

- **ReadingProgress**
  - `progress_id`: STRING
  - `last_read_page`: INT
  - `book_percentage`: INT
  - `start`: STRING
  - `is_finished`: BOOLEAN
  - `book_id`: FK
  - `kindle_id`: FK
  
- **Relationships**
  - `Reading progress is tracked for one book (ReadingProgress.book_id references Books.ISBN).`
  - `Reading progress is tracked on one Kindle (ReadingProgress.kindle_id references Kindles.kindle_id).`

## Routes
The application includes the following routes:

### General Routes

`GET /: Displays the welcome page.`

`GET /dashboard: Displays the dashboard (requires authentication and verification).`

### Profile Management
`GET /profile: Edit the authenticated user's profile (ProfileController@edit).`

`PATCH /profile: Update the authenticated user's profile (ProfileController@update).`

`DELETE /profile: Delete the authenticated user's profile (ProfileController@destroy).`


### Resource Routes
**Authors (AuthorController):**

`GET /authors: List all authors.`

`POST /authors: Create a new author.`

`GET /authors/{author}: Display a single author. `

`GET /authors/{author}/edit: Edit an author.`

`PATCH /authors/{author}: Update an author.`

`DELETE /authors/{author}: Delete an author.`

 **Books (BookController):**

`GET /books: List all books.`

`POST /books: Create a new book.`

`GET /books/{book}: Display a single book.`

`GET /books/{book}/edit: Edit a book.`

`PATCH /books/{book}: Update a book.`

`DELETE /books/{book}: Delete a book.`

**Bookmarks (BookmarkController):**

`GET /bookmarks: List all bookmarks.`

`POST /bookmarks: Create a new bookmark.`

`GET /bookmarks/{bookmark}: Display a single bookmark.`

`GET /bookmarks/{bookmark}/edit: Edit a bookmark.`

`PATCH /bookmarks/{bookmark}: Update a bookmark.`

`DELETE /bookmarks/{bookmark}: Delete a bookmark.`

**Downloads (DownloadController):**

`GET /downloads: List all downloads.`

`POST /downloads: Create a new download.`

`GET /downloads/{download}: Display a single download.`

`GET /downloads/{download}/edit: Edit a download.`

`PATCH /downloads/{download}: Update a download.`

`DELETE /downloads/{download}: Delete a download.`

**Highlighted Quotes (HighlightedQuoteController):**

`GET /highlightedQuotes: List all highlighted quotes.`

`POST /highlightedQuotes: Create a new highlighted quote.`

`GET /highlightedQuotes/{highlightedQuote}: Display a single highlighted quote.`

`GET /highlightedQuotes/{highlightedQuote}/edit: Edit a highlighted quote.`

`PATCH /highlightedQuotes/{highlightedQuote}: Update a highlighted quote.`

`DELETE /highlightedQuotes/{highlightedQuote}: Delete a highlighted quote.`

**Kindles (KindleController):**

`GET /kindles: List all Kindle devices.`

`POST /kindles: Create a new Kindle device.`

`GET /kindles/{kindle}: Display a single Kindle.`

`GET /kindles/{kindle}/edit: Edit a Kindle.`

`PATCH /kindles/{kindle}: Update a Kindle.`

`DELETE /kindles/{kindle}: Delete a Kindle.`

**Publishers (PublisherController):**

`GET /publishers: List all publishers.`

`POST /publishers: Create a new publisher.`

`GET /publishers/{publisher}: Display a single publisher.`

`GET /publishers/{publisher}/edit: Edit a publisher.`

`PATCH /publishers/{publisher}: Update a publisher.`

`DELETE /publishers/{publisher}: Delete a publisher.`

**Reading Progress (ReadingProgressController):**

`GET /reading_progress: List all reading progress records.`

`POST /reading_progress: Create a new reading progress record.`

`GET /reading_progress/{readingProgress}: Display a single reading progress record.`

`GET /reading_progress/{readingProgress}/edit: Edit a reading progress record.`

`PATCH /reading_progress/{readingProgress}: Update a reading progress record.`

`DELETE /reading_progress/{readingProgress}: Delete a reading progress record.`

### Relationship Management
**Attach/Detach Relationships:**

`POST /books/{book}/kindles/{kindle}/attach: Attach a Kindle to a book (BookController@attachKindle).`

`POST /books/{book}/kindles/{kindle}/detach: Detach a Kindle from a book (BookController@detachKindle).`

`POST /books/{book}/authors/{author}/attach: Attach an author to a book (BookController@attachAuthor).`

`POST /books/{book}/authors/{author}/detach: Detach an author from a book (BookController@detachAuthor).`

`POST /kindles/{kindle}/books/{book}/attach: Attach a book to a Kindle (KindleController@attachBook).`

`POST /kindles/{kindle}/books/{book}/detach: Detach a book from a Kindle (KindleController@detachBook).`

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request.

## Contact

For any questions or inquiries, please contact [kodzukeds@gmail.com](mailto:kodzukeds@gmail.com).