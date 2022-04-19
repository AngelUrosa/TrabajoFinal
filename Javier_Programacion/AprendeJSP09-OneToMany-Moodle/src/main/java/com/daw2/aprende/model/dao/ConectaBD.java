package com.daw2.aprende.model.dao;

import org.apache.commons.dbcp.BasicDataSource;

import javax.sql.DataSource;
import java.sql.Connection;
import java.sql.SQLException;

// http://castelarlamp.duckdns.org:8010/phpmyqdmin
// jdbc:mysql://iescastelar.duckdns.org:33062/daw2_jsp0
public class ConectaBD {
    final static String DB_URL = "iescastelar.duckdns.org";
    final static int DB_PORT = 33062;
    final static String DB_NAME = "daw2_jsp12";
    final static String DB_USER = "daw2_jsp12";
    final static String DB_PASSWORD = "castelar2021";
    private static ConectaBD conectaBD;
    private static DataSource ds;

    // https://mvnrepository.com/artifact/commons-dbcp/commons-dbcp
    private static DataSource estableceConexionPool() {
        BasicDataSource basicDataSource = new BasicDataSource();
        basicDataSource.setDriverClassName("com.mysql.cj.jdbc.Driver");
        basicDataSource.setUsername(DB_USER);
        basicDataSource.setPassword(DB_PASSWORD);
        String urlAcceso = "jdbc:mysql://" + DB_URL + ":" + DB_PORT + "/" + DB_NAME;
        basicDataSource.setUrl(urlAcceso);
        basicDataSource.setMaxActive(50);
        basicDataSource.setMaxIdle(5);
        basicDataSource.setDefaultAutoCommit(false);
        basicDataSource.setInitialSize(10);
        basicDataSource.setValidationQuery("select 1");
        return basicDataSource;
    }

    public static Connection getConnection() throws SQLException {
        if (ds == null)
            ds = estableceConexionPool();
        return ds.getConnection();
    }
}
