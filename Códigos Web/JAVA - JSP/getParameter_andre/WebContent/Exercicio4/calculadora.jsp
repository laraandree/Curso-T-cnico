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
		double num_1;
		double num_2;
		int opcao;
		double resultado=0;
		
		num_1 = Integer.parseInt(request.getParameter("num_1"));
		num_2 = Integer.parseInt(request.getParameter("num_2"));
		opcao = Integer.parseInt(request.getParameter("opcao"));
		
		if (opcao == 1){resultado = num_1 + num_2;}
		else if (opcao == 2){resultado = num_1 / num_2;}
		else if (opcao == 3){resultado = num_1 * num_2;}
		else if (opcao == 4){resultado = num_1 - num_2;}
		else {out.println("Digite numero válido");}
	%>
	
	<br/>
	Resultado: <%=resultado %><br/>
	
	<a href="calculadora.html"> Refazer </a>
</body>
</html>