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
	int inicio;
	int fim;
	
	inicio = Integer.parseInt(request.getParameter("num1"));
	fim = Integer.parseInt(request.getParameter("num2"));
	
	for (int cont=inicio; cont <= fim ; cont++ ){
		if (cont % 2==0){
			out.println(cont+"par<br/>");
		}
		else if (cont %2 ==1){
			out.println(cont+"impar<br/>");
		}
		
	}
%>
</body>
</html>