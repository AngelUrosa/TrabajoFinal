package com.daw2.ejemplo01.servlets.alumnos;


import com.daw2.ejemplo01.model.dao.AlumnosDao;
import com.daw2.ejemplo01.model.dao.impl.AlumnosDaoImpl;
import com.daw2.ejemplo01.model.entity.Alumno;
import com.daw2.ejemplo01.services.AlumnosService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;


import java.io.IOException;
import java.util.Map;
import java.util.logging.Logger;


//urlPatterns={"/usuarios/alta"}
@WebServlet(value = "/alumnos/alta")
public class AltaAlumnosServlet extends HttpServlet {
    private final static Logger LOG = Logger.getLogger(AltaAlumnosServlet.class.getName());
    private AlumnosService alumnosService;


    public void init() {
        LOG.info("Inicializando AltaServlet");
        alumnosService = AlumnosService.getInstance();  // UsuariosService es un Singleton

    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        AlumnosDao alumnosDao = new AlumnosDaoImpl();
        request.setCharacterEncoding("UTF-8");
        request.setAttribute("alumno", new Alumno("", "", "", "", 0));
        request.setAttribute("alumnos", alumnosDao.listAll());
        request.getRequestDispatcher("/alumnos/alta.jsp").forward(request, response);
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        AlumnosDao alumnosDao = new AlumnosDaoImpl();
        request.setCharacterEncoding("UTF-8");
        Alumno alumno = alumnosService.requestToClass(request);

        Map<String, String> errorsItems = alumnosService.errors(request);

        if (errorsItems.isEmpty()) {
            if (alumnosDao.add(alumno) != null) {
                String mensaje = "El alumno " + alumno.getNombre() + " " + alumno.getApellido1() + " " + alumno.getApellido2() + " ha sido dado de alta.";
                request.setAttribute("alertSuccess", mensaje);
                alumno = new Alumno("", "", "", 0);
            } else {
                String mensaje = "Los datos introducidos son erroneos vuelva a intentarlo";
                request.setAttribute("alertDanger", mensaje);
            }
        } else {
            request.setAttribute("alertDanger", "Los datos no son correctos, no se pudo guardar los datos");
        }
        request.setAttribute("errorsItems", errorsItems);
        request.setAttribute("alumno", alumno);
        request.getRequestDispatcher("/#").forward(request, response);
    }

    public void destroy() {
    }
}