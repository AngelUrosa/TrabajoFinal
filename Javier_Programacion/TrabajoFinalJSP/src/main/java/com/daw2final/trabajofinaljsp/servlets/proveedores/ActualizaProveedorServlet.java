package com.daw2final.trabajofinaljsp.servlets.proveedores;

import com.daw2final.trabajofinaljsp.model.dao.ProveedoresDao;
import com.daw2final.trabajofinaljsp.model.dao.impl.ProveedoresDaoImpl;
import com.daw2final.trabajofinaljsp.model.entity.Proveedor;
import com.daw2final.trabajofinaljsp.services.ProveedoresService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.Map;
import java.util.logging.Logger;




    @WebServlet(value = "/proveedores/actualiza")
    public class ActualizaProveedorServlet extends HttpServlet {
        private final static Logger LOG = Logger.getLogger(ActualizaProveedorServlet.class.getName());
        private ProveedoresService proveedoresService;

        public void init() {
            LOG.info("Inicializando ActualizaUsuarioServlet");
            proveedoresService = ProveedoresService.getInstance();  // UsuariosService es un Singleton
        }

        @Override
        protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
            ProveedoresDao proveedoresDao = new ProveedoresDaoImpl();
            request.setCharacterEncoding("UTF-8");
            Proveedor proveedor;
            if (request.getParameter("nifBusca") != null) {  // Si se ha seleccionado un nif de busqueda
                String nifBusca = request.getParameter("nifBusca") != null ? request.getParameter("nifBusca").trim() : "";
                proveedor = proveedoresDao.getByNif(nifBusca);
                if (proveedor == null) {
                    proveedor = new Proveedor(0,"", "", "", "","","","");
                    request.setAttribute("alertWarning", "No se ha encontrado ningún proveedor con el Nif " + request.getParameter("nifBusca"));
                } else {
                    request.setAttribute("alertInfo", "Proveedor encontrado. Puede modificarlo ahora");
                }
            } else {
                proveedor = new Proveedor(0,"", "", "", "","","","");
            }

            if (proveedor.getId() != null) {
                request.setAttribute("readonly", "");
                request.setAttribute("showButtonSubmit", true);
            } else
                request.setAttribute("readonly", "readonly");

            request.setAttribute("proveedor", proveedor);
            request.setAttribute("proveedores", proveedoresDao.listAll());
            request.getRequestDispatcher("/proveedores/actualiza.jsp").forward(request, response);


        }

        @Override
        protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
            ProveedoresDao proveedoresDao = new ProveedoresDaoImpl();
            request.setCharacterEncoding("UTF-8");
            Proveedor proveedor = proveedoresService.requestToClass(request);

            Map<String, String> errorsItems = proveedoresService.errors(request);

            if (errorsItems.isEmpty()) {
                if (proveedoresDao.update(proveedor)) {
                    String mensaje = "El proveedor " + proveedor.getNombre() + " " + proveedor.getApellido1() + " " + proveedor.getApellido2() + " ha sido modificado";
                    request.setAttribute("alertSuccess", mensaje);
                    proveedor = new Proveedor(0, "", "", "","","","","");
                    request.setAttribute("readonly", "readonly");
                    request.setAttribute("showButtonSubmit", false);
                } else {
                    String mensaje = "El proveedor " + proveedor.getNombre() + " " + proveedor.getApellido1() + " " + proveedor.getApellido2() + " no ha sido dado de alta. Ya existe un usuario con el nif " + proveedor.getNif();
                    request.setAttribute("alertDanger", mensaje);
                    request.setAttribute("showButtonSubmit", true);
                }
            } else {
                request.setAttribute("alertDanger", "Los datos no son correctos, no se pudo guardar los datos");
                request.setAttribute("showButtonSubmit", true);
            }
            request.setAttribute("errorsItems", errorsItems);
            request.setAttribute("proveedor", proveedor);
            request.setAttribute("proveedores", proveedoresDao.listAll());
            request.getRequestDispatcher("/proveedores/actualiza.jsp").forward(request, response);
        }

        public void destroy() {
        }
    }

