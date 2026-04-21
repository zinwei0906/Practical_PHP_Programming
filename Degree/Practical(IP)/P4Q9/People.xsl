<?xml version="1.0" encoding="UTF-8"?>
<!--
    Document   : People.xsl
    Created on : March 23, 2022, 12:16 PM
    Author     : tanzw
    Description:
        Purpose of transformation follows.
-->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Famous People</title>
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
                <h1>Famous People</h1>
                <hr />
                <table id="table">
                    <tr>
                        <th>No</th>
                        <th>People Name</th>
                        <th>Description</th>
                        <th>BornDate</th>
                        <th>Died Date</th>
                    </tr>
                    <xsl:for-each select="//person">
                        <xsl:sort select="name" order="ascending"/>
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
                                <xsl:value-of select="description" />
                            </td>
                            <td>
                                <xsl:value-of select="@bornDate" />
                            </td>
                            <td>
                                <xsl:value-of select="@diedDate" />
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
