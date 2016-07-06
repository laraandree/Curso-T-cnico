<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
</head>
<body> 
	<%
		String marca;
		String processador;
		String memoriaRam;
		String memoriaHd;
		String sistemaOperacional;
		
		marca = request.getParameter("marca");
		processador = request.getParameter ("processador");
		memoriaRam = request.getParameter ("memoriaRam");
		memoriaHd = request.getParameter ("memoriaHd");
		sistemaOperacional = request.getParameter("sistemaOperacional");
	%>
	Marca: <%=marca %><br/>
	Processador: <%=processador %><br/>
	Memoria RAM: <%=memoriaRam %><br/>
	Memoria HD: <%=memoriaHd %><br/>
	Sistema Operacional: <%=sistemaOperacional %><br/>
</body>
</html>