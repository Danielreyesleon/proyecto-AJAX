# Tienda Virtual — Proyecto AJAX

Tienda virtual creada para el **curso de AJAX en U Fidelitas**.  
El proyecto demuestra el uso de **XMLHttpRequest** (técnica clásica de AJAX) y la **Fetch API** (enfoque moderno) para cargar y mostrar productos de forma asíncrona, sin recargar la página.

## Características

- **Carga asíncrona de productos** con `XMLHttpRequest` (y `fetch` como respaldo).
- **Búsqueda en tiempo real** por nombre y descripción.
- **Filtro por categoría** generado dinámicamente desde los datos.
- **Carrito de compras** con control de cantidades, eliminación de ítems y resumen del total.
- **Notificaciones tipo toast** para retroalimentación al usuario.
- Diseño **responsive** adaptable a móvil, tablet y escritorio.
- Escape de HTML en toda la salida dinámica para prevenir XSS.

## Estructura del proyecto

```
proyecto-AJAX/
├── index.html          # Página principal
├── css/
│   └── styles.css      # Estilos de la tienda
├── js/
│   └── app.js          # Lógica AJAX y carrito
└── data/
    └── products.json   # Catálogo de productos (fuente de datos)
```

## Cómo ejecutar

Debido a las restricciones de CORS del navegador, el proyecto **debe servirse a través de un servidor HTTP** (no abrirse directamente como archivo `file://`).

### Opción 1 — Live Server (VS Code)
Instala la extensión **Live Server** y haz clic en *Go Live*.

### Opción 2 — Python
```bash
# Python 3
python -m http.server 8080
```
Luego abre `http://localhost:8080` en el navegador.

### Opción 3 — Node.js
```bash
npx serve .
```

## Conceptos de AJAX demostrados

| Concepto | Dónde se aplica |
|---|---|
| `XMLHttpRequest` | `loadProductsXHR()` en `js/app.js` |
| Estados de `readyState` | Manejador `onreadystatechange` |
| Respuesta JSON | `JSON.parse(xhr.responseText)` |
| `Fetch API` | `loadProductsFetch()` en `js/app.js` |
| `async / await` | Función `init()` |
| Manipulación del DOM sin recarga | `renderProducts()`, `renderCartItems()` |

## Tecnologías utilizadas

- HTML5 semántico
- CSS3 (variables, grid, flexbox, animaciones)
- JavaScript ES6+ (sin frameworks ni librerías externas)
