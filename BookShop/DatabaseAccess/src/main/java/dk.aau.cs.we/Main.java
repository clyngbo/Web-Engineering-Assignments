package dk.aau.cs.we;

import org.springframework.context.ApplicationContext;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;

import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;

import dk.aau.cs.we.configuration.PersistenceApplicationContext;

public class Main {
    private static EntityManagerFactory emf;

    public static void main(String[] args) {
        ApplicationContext applicationContext = new AnnotationConfigApplicationContext(PersistenceApplicationContext.class);
        emf = Persistence.createEntityManagerFactory("default");

        emf.close();
    }
}
