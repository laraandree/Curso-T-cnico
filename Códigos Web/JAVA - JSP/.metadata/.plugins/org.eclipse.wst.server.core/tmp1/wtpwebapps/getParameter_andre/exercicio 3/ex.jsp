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
		int num_1;
		int num_2;
		String resultado;
		
		num_1 = Integer.parseInt(request.getParameter("num_1"));
		num_2 = Integer.parseInt(request.getParameter("num_2"));
		
		if (num_1 > num_2){	resultado = "Numero 1 � maior";}
		else if (num_1 < num_2){ resultado = "Numero 2 � maior";}
		else  { resultado = "Os n�meros s�o iguais";}
	%>
	
	Numero 1: <%=num_1 %> <br/>
	Numero 2: <%=num_2 %> <br/>
	Resultado: <%=resultado %>
	
	
</body>
</html>