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
		double numero;
		
		numero = 	Double.parseDouble(request.getParameter("numero"));
		
		if (numero % 1 == 0){ out.println("Numero é impar");}
		else {out.println("Numero par");}
	%>
</body>
</html>