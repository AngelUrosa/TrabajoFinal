package com.daw2.ejemplo01.model.dao;


import com.daw2.ejemplo01.model.entity.Alumno;

public interface AlumnosDao extends Dao<Alumno, Integer> {
    Alumno getByNif(String nif);
}
