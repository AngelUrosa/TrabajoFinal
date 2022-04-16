package com.daw2.aprende.model.dao;


import com.daw2.aprende.model.entity.Empleado;

import java.util.List;

public interface EmpleadosDao extends Dao<Empleado, Integer> {
    List<Empleado> listAllFillDpto();
}
