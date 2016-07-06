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
		String nome;
		double nota1;
		double nota2;
		
		nota1 = Double.parseDouble (request.getParameter("notaPrimeiroBi"));
		nota2 = Double.parseDouble (request.getParameter("notaSegundoBi"));
		nome = request.getParameter("nomeAluno");
		
		double somaMedia = (nota1 + nota2) /2;
		
		if (somaMedia >=70){out.println("Aluno: "+nome+", aprovado com média "+somaMedia);}
		else if (somaMedia > 40 && somaMedia < 70){out.println("Aluno: "+nome+", em recuperação com média "+somaMedia);}
		else {out.println("Aluno: "+nome+", reprovado com média "+somaMedia);}
	%>

</body>
</html>