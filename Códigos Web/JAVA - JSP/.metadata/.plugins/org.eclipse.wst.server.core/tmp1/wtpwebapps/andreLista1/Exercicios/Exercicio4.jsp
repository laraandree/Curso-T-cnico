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
		double nota1;
		double nota2;
		double nota3;
		double nota4;
		double somaMedia;
		String resultado;
		
		nota1 = Double.parseDouble (request.getParameter("nota1"));
		nota2 = Double.parseDouble (request.getParameter("nota2"));
		nota3 = Double.parseDouble (request.getParameter("nota3"));
		nota4 = Double.parseDouble (request.getParameter("nota4"));
		
		somaMedia = (nota1 + nota2 + nota3 + nota4) / 4;
		out.println("Média: "+somaMedia);
		
	%>
</body>
</html>