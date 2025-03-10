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

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request.

## Contact

For any questions or inquiries, please contact [kodzukeds@gmail.com](mailto:kodzukeds@gmail.com).