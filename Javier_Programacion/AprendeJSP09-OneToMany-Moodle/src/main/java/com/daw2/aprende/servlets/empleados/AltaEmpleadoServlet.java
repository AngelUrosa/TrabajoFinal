package com.daw2.aprende.servlets.empleados;

import com.daw2.aprende.model.dao.DepartamentosDao;
import com.daw2.aprende.model.dao.EmpleadosDao;
import com.daw2.aprende.model.dao.impl.DepartamentosDaoImpl;
import com.daw2.aprende.model.dao.impl.EmpleadosDaoImpl;
import com.daw2.aprende.model.entity.Empleado;
import com.daw2.aprende.services.EmpleadosService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;


import java.io.IOException;
import java.util.Date;
import java.util.List;
import java.util.Map;
import java.util.logging.Logger;


//urlPatterns={"/usuarios/alta"}
@WebServlet(value="/empleados/alta")
public class AltaEmpleadoServlet extends HttpServlet {
    private final static Logger LOG = Logger.getLogger(AltaEmpleadoServlet.class.getName());
    private EmpleadosService empleadosService;
    private DepartamentosDao departamentosDao;

    public void init() {
        LOG.info("Inicializando AltaServlet");
        empleadosService = EmpleadosService.getInstance();  // UsuariosService es un Singleton
        departamentosDao = new DepartamentosDaoImpl();
    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        EmpleadosDao empleadosDao = new EmpleadosDaoImpl();
        request.setCharacterEncoding("UTF-8");
        request.setAttribute("empleado", new Empleado("","","","","",0,new Date()));
        request.setAttribute("empleados", empleadosDao.listAllFillDpto());
        request.setAttribute("departamentos", departamentosDao.listAll());
        request.getRequestDispatcher("/empleados/alta.jsp").forward(request, response);
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        EmpleadosDao empleadosDao = new EmpleadosDaoImpl();
        request.setCharacterEncoding("UTF-8");
        Empleado empleado = empleadosService.requestToClass(request);

        Map<String,String> errorsItems = empleadosService.errors(request);

        if (errorsItems.isEmpty()) {
            if (empleadosDao.add(empleado)!=null) {
                String mensaje = "El empleado " + empleado.getNombre() + " " + empleado.getApellido1() + " " + empleado.getApellido2() + " ha sido dado de alta.";
                request.setAttribute("alertSuccess", mensaje);
                empleado =  new Empleado("","","","","",0,new Date());
            } else {
                String mensaje = "El empleado " + empleado.getNombre() + " " + empleado.getApellido1() + " " + empleado.getApellido2() + " no ha sido dado de alta. Ya existe un usuario con el nif " + empleado.getNif();
                request.setAttribute("alertDanger", mensaje);
            }
        } else {
            request.setAttribute("alertDanger", "Los datos no son correctos, no se pudo guardar los datos");
        }
        request.setAttribute("errorsItems", errorsItems);
        request.setAttribute("empleado", empleado);
        request.setAttribute("empleados", empleadosDao.listAllFillDpto());
        request.setAttribute("departamentos", departamentosDao.listAll());
        request.getRequestDispatcher("/empleados/alta.jsp").forward(request, response);
    }

    public void destroy() {
    }
}