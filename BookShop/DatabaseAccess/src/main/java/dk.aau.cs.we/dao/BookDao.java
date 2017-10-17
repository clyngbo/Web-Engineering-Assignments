package dk.aau.cs.we.dao;

import dk.aau.cs.we.entities.Book;

import java.util.List;

public interface BookDao {

    /**
     * Creates new book in database
     *
     * @param book
     */
    void createBook(Book book);

    /**
     * Deletes given book from database
     *
     * @param book
     */
    void deleteBook(Book book);

    /**
     * Updates given book in database
     *
     * @param book
     */
    void updateBook(Book book);

    /**
     * Finds book by given id in database
     *
     * @param id id of book
     * @return Book with given id
     */
    Book findBookById(Long id);

    /**
     * Finds all books in database
     *
     * @return List of all books
     */
    List<Book> findAllBooks();
}
