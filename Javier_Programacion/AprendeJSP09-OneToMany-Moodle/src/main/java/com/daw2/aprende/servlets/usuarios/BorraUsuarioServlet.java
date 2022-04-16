package com.daw2.aprende.servlets.usuarios;

import com.daw2.aprende.model.dao.UsuariosDao;
import com.daw2.aprende.model.dao.impl.UsuariosDaoImpl;
import com.daw2.aprende.model.entity.Usuario;
import com.daw2.aprende.services.UsuariosService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.logging.Logger;


//urlPatterns={"/usuarios/alta"}
@WebServlet(value = "/usuarios/borra")
public class BorraUsuarioServlet extends HttpServlet {
    private final static Logger LOG = Logger.getLogger(BorraUsuarioServlet.class.getName());
    private UsuariosService usuariosService;

    public void init() {
        LOG.info("Inicializando ConsultaUsuarioServlet");
        usuariosService = UsuariosService.getInstance();  // UsuariosService es un Singleton
    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        UsuariosDao usuariosDao = new UsuariosDaoImpl();
        request.setCharacterEncoding("UTF-8");
        Usuario usuario;
        if (request.getParameter("nifBusca") != null) {  // Si se ha seleccionado un nif de busqueda
            String nifBusca = request.getParameter("nifBusca") != null ? request.getParameter("nifBusca").trim() : "";
            usuario = usuariosDao.getByNif(nifBusca);
            if (usuario == null) {
                usuario = new Usuario("", "", "", "");
                request.setAttribute("alertWarning", "No se ha encontrado ningún usuario con el Nif " + request.getParameter("nifBusca"));
                request.setAttribute("showButtonSubmit", false);
            } else {
                request.setAttribute("alertInfo", "Usuario encontrado.");
                request.setAttribute("showButtonSubmit", true);
            }
        } else {
            usuario = new Usuario("", "", "", "");
            request.setAttribute("showButtonSubmit", false);
        }
        request.setAttribute("usuario", usuario);
        request.setAttribute("usuarios", usuariosDao.listAll());
        request.setAttribute("readonly", "readonly");
        request.getRequestDispatcher("/usuarios/borra.jsp").forward(request, response);
    }


    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        UsuariosDao usuariosDao = new UsuariosDaoImpl();
        request.setCharacterEncoding("UTF-8");
        Usuario usuario = usuariosService.requestToClass(request);

        if (usuariosDao.delete(usuario.getId())) {
            String mensaje = "El usuario " + usuario.getNombre() + " " + usuario.getApellido1() + " " + usuario.getApellido2() + " ha sido modificado";
            request.setAttribute("alertSuccess", mensaje);
            usuario = new Usuario("", "", "", "");
            request.setAttribute("readonly", "readonly");
        } else {
            String mensaje = "El usuario " + usuario.getNombre() + " " + usuario.getApellido1() + " " + usuario.getApellido2() + " no ha sido dado de alta. Ya existe un usuario con el nif " + usuario.getNif();
            request.setAttribute("alertDanger", mensaje);
        }
        request.setAttribute("usuario", usuario);
        request.setAttribute("usuarios", usuariosDao.listAll());
        request.getRequestDispatcher("/usuarios/borra.jsp").forward(request, response);
    }


    public void destroy() {
    }
}