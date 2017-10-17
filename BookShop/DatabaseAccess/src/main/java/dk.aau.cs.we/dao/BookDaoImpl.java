package dk.aau.cs.we.dao;

import dk.aau.cs.we.entities.Book;

import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import java.util.List;

public class BookDaoImpl implements BookDao {

    @PersistenceContext
    private EntityManager em;

    @Override
    public void createBook(Book book) {
        em.persist(book);
    }

    @Override
    public void deleteBook(Book book) {
        em.remove(findBookById(book.getId()));
    }

    @Override
    public void updateBook(Book book) {
        em.merge(book);
    }

    @Override
    public Book findBookById(Long id) {
        return em.find(Book.class, id);
    }

    @Override
    public List<Book> findAllBooks() {
        return em.createQuery("SELECT b FROM Book b").getResultList();
    }
}
