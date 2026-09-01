let baseUrlformat = '.php';
var pathParts = window.location.pathname.split('/').filter(Boolean);
var basePath = pathParts.length ? '/' + pathParts[0] : '';
var baseUrl = window.location.origin + basePath;
