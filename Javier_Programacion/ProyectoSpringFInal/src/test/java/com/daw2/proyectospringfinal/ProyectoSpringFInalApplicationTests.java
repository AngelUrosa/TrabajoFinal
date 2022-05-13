package com.daw2.proyectospringfinal;

import com.daw2.proyectospringfinal.model.repository.ArticulosRepository;
import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;

import java.util.List;

@SpringBootTest
class ProyectoSpringFInalApplicationTests {
@Autowired
    ArticulosRepository articulosRepository;
    @Test
    void contextLoads() {
        List<Object[]> list = articulosRepository.top3();
        for (Object[] obj:list) {
            System.out.println(obj[0]+"\t"+obj[1]+"\t"+obj[2]);
        }

    }

}
