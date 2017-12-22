<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>

<body style="text-align:center; padding:0; margin:0; background-color:#E5E5E5; font-family: Arial, Helvetica, sans-serif; ">
  <h1 style="padding: 4%; margin:0 0 2% 0; background-color: #000; opacity:0.95; color: #ffffff; font-weight: 600; font-family: Arial, Helvetica, sans-serif;">About</h1>

  <xsl:for-each select="hotel">
    <div style="background-color:#f1f1f1; padding: 2%; margin-bottom: 5%; opacity: 0.9; text-align:left; max-width:50%; margin-left:50%; transform:translateX(-50%);">
    <p style="font-size:100%"> <xsl:value-of select="description"/> </p>
    <h1>Shivam Sharma</h1>
    <p style="font-size:100%; white-space:pre-line;"> <xsl:value-of select="Shivam"/> </p>
    <h1>Tshewang Dema</h1>
    <p style="font-size:100%; white-space:pre-line;"> <xsl:value-of select="Tshewang"/> </p>
  </div>
</xsl:for-each>

  <div style="padding: 2%; margin:0; background-color: #000; opacity:0.95; color: #ffffff; font-weight: 400; font-family: Arial, Helvetica, sans-serif;">
  <h4> <![CDATA[    Prison Management | All Rights Reserved]]></h4>
  </div>

</body>
</html>
</xsl:template>
</xsl:stylesheet>
