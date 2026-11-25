<%Option Explicit
Response.Buffer=True%>
<!--#include file="inc/conn.asp"-->
<%
CONST KEY = "101325" '加密因子，试用版固定为101325

'dim url

'url = Request.Form("url")

'if  len( url ) =  0 THEN url = "rtsp://localhost/real9video.rm"

'下面进行加密
dim ins
set ins = CreateObject("UrlEnc.BaseEnc")
'dim EncUrl
'EncUrl = ins.UrlTsEnc( url , key  ) 



dim dnum,checknum
dnum=trim(request("num"))
checknum=trim(request.cookies("look")("s"))
if dnum="" or checknum="" then
  response.redirect "error.asp"
end if
if not dnum=checknum then
  response.redirect "error.asp"
end if

dim url,id,rs,s
randomize
s=Int((8999999999)*Rnd +1000000000)
response.cookies("look")("s")=s
id=trim(request("id"))
if id="" then
  response.redirect "error.asp?id=4"
end if
if id<>"" and IsNumeric(id) then
set rs=conn.execute("select a.url,b.name,b.pwd,b.server1,b.server2 from [url] a,[server] b where a.id="&id&" and b.id=a.ser")
if rs.eof and rs.bof then
  response.redirect "error.asp?id=4"
else

  if rs(1)="" and rs(2)="" then
  if request.QueryString("flag")=1 then
   url="rtsp://61.130.112.91:559/"&trim(rs(4))&trim(rs(0))
  else
   url=trim(rs(3))&trim(rs(4))&trim(rs(0))
  end if
   
  elseif rs(1)<>"" and rs(2)="" then
 if request.QueryString("flag")=1 then
   url="rtsp://61.130.112.91:559/"&trim(rs(1))&"@"&trim(rs(4))&trim(rs(0))
  else
    url=trim(rs(3))&trim(rs(1))&"@"&trim(rs(4))&trim(rs(0))
	end if
  elseif rs(1)<>"" and rs(2)<>"" then
    if request.QueryString("flag")=1 then
   url="rtsp://61.130.112.91:559/"&trim(rs(1))&":"&trim(rs(2))&"@"&trim(rs(4))&trim(rs(0))
  else
    url=trim(rs(3))&trim(rs(1))&":"&trim(rs(2))&"@"&trim(rs(4))&trim(rs(0))
	end if
  else
       if request.QueryString("flag")=1 then
   url="rtsp://61.130.112.91:559/"&trim(rs(4))&trim(rs(0))
  else
    url=trim(rs(3))&trim(rs(4))&trim(rs(0))
	end if
  end if
  
end if
rs.close
set rs=nothing
end if
response.write (ins.UrlTsEnc(url,key))
conn.close
set conn=nothing
if Err.Number <> 0 then
	Alert ("Error # " & CStr(Err.Number) & " " & Err.Description)
Err.Clear   '清除该错误。
end if
%>