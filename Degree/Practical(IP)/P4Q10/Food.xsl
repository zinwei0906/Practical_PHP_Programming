<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Food List</title>
                <style>
                    #table {
                    font-family: Arial, Helvetica, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                    }

                    #table td, #table th {
                    border: 1px solid #ddd;
                    padding: 8px;
                    }

                    #table tr:nth-child(even){background-color: #f2f2f2;}

                    #table tr:hover {background-color: #ddd;}

                    #table th {
                    padding-top: 12px;
                    padding-bottom: 12px;
                    text-align: left;
                    background-color: skyblue;
                    color: white;
                    }
                </style>
            </head>
            <body>
                <h1>Food List</h1>
                <hr />
                <table id="table">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>carbs PerServing</th>
                        <th>fiber PerServing</th>
                        <th>fat PerServing</th>
                        <th>kjPer Serving</th>
                        <th>Type</th>
                    </tr>
                    <xsl:for-each select="foodList/foodItem">
                        <xsl:if test="position() &gt;= 3 and position() &lt;= 5">
                            <!--                            <xsl:if test="@type='fruit' or @type='vegetable'">-->
                            <!--                                <xsl:if test="@type!='fruit'">-->
                            <tr>
                                <td>
                                    <countNo>
                                        <xsl:value-of select="position()" />
                                    </countNo>
                                </td>
                                <td>
                                    <xsl:value-of select="name" />
                                </td>
                                <td>
                                    <xsl:value-of select="carbsPerServing" />
                                </td>
                                <td>
                                    <xsl:value-of select="fiberPerServing" />
                                </td>
                                <td>
                                    <xsl:value-of select="fatPerServing" />
                                </td>
                                <td>
                                    <xsl:value-of select="kjPerServing" />
                                </td>
                                <td>
                                    <xsl:value-of select="@type" />
                                </td>
                            </tr>
                        </xsl:if>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>