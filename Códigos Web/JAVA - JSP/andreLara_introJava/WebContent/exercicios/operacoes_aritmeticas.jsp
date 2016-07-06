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
		int num_1 = 5;
		int num_2 = 10;
		float numf_1 = 2.5f;
		float numf_2 = 5.5f;
		
		int soma = num_1 + num_2;
		float subtracao = numf_1 - num_2;
		int divisao = num_1 / num_2;
		float multiplicacao = numf_1 * num_1;
		
		out.println("Soma é: "+soma);
		out.println(subtracao);
		out.println(divisao);
		out.println(multiplicacao);
	%>
</body>
</html>