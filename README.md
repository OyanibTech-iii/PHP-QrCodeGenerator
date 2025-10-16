# 🔗 QR Code Generator

<div align="center">

![QR Code Generator](https://img.shields.io/badge/QR%20Code-Generator-blue?style=for-the-badge&logo=qrcode)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![SVG](https://img.shields.io/badge/SVG-FFB13B?style=for-the-badge&logo=svg&logoColor=white)
![No GD Required](https://img.shields.io/badge/No%20GD%20Extension-Required-green?style=for-the-badge)

A modern, lightweight QR code generator built with PHP that works without requiring the GD extension. Generate beautiful SVG QR codes with custom colors and sizes through an elegant web interface.

[![Live Demo](https://img.shields.io/badge/🚀%20Live%20Demo-Try%20Now-brightgreen?style=for-the-badge)](https://your-domain.com)
[![Download](https://img.shields.io/badge/📥%20Download-Latest%20Release-blue?style=for-the-badge)](https://github.com/your-username/qrgenerator/releases)

</div>

---

## ✨ Features

### 🎨 **Modern Web Interface**
- **Beautiful gradient design** with smooth animations
- **Responsive layout** that works on all devices
- **Intuitive form controls** with real-time validation
- **Professional popup modal** for QR code display

### 🔧 **QR Code Generation**
- **SVG format** - scalable vector graphics (no GD extension required)
- **Custom colors** - choose foreground and background colors
- **Multiple sizes** - from 200x200 to 500x500 pixels
- **High error correction** - ensures reliable scanning
- **UTF-8 encoding** - supports international characters

### 🚀 **User Experience**
- **Instant generation** with loading states
- **One-click download** directly from the modal
- **Keyboard shortcuts** - Escape to close modal
- **Error handling** with user-friendly messages
- **No external dependencies** - works offline

---

## 🛠️ Installation

### Prerequisites
- **PHP 7.4+** (tested with PHP 8.x)
- **Web server** (Apache, Nginx, or built-in PHP server)
- **Composer** (for dependency management)

### Quick Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/qrgenerator.git
   cd qrgenerator
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Start the development server**
   ```bash
   php -S localhost:8000
   ```

4. **Open your browser**
   ```
   http://localhost:8000
   ```

### XAMPP/WAMP Setup

1. **Extract files** to your web server directory
   ```
   C:\xampp\htdocs\qrgenerator\
   ```

2. **Run Composer install**
   ```bash
   composer install
   ```

3. **Access via browser**
   ```
   http://localhost/qrgenerator
   ```

---

## 🎯 Usage

### Basic Usage

1. **Enter your data** - text, URL, or any content you want to encode
2. **Choose size** - select from 200x200 to 500x500 pixels
3. **Pick colors** - customize foreground and background colors
4. **Generate** - click the "Generate QR Code" button
5. **Download** - save your QR code from the popup modal

### Supported Content Types

- **URLs** - `https://example.com`
- **Text** - `Hello World!`
- **Contact info** - `BEGIN:VCARD...`
- **WiFi credentials** - `WIFI:T:WPA;S:NetworkName;P:password;H:false;;`
- **Email** - `mailto:user@example.com`
- **SMS** - `sms:+1234567890`
- **Phone** - `tel:+1234567890`

---

## 📱 Screenshots

<div align="center">

### Main Interface
![Main Interface](https://via.placeholder.com/600x400/667eea/ffffff?text=QR+Code+Generator+Interface)

### Generated QR Code Modal
![QR Code Modal](https://via.placeholder.com/600x400/764ba2/ffffff?text=QR+Code+Modal+Popup)

</div>

---

## 🔧 Technical Details

### Architecture
- **Frontend**: Pure HTML5, CSS3, JavaScript (ES6+)
- **Backend**: PHP with Endroid QR Code library
- **Format**: SVG (Scalable Vector Graphics)
- **Dependencies**: Managed via Composer

### File Structure
```
qrgenerator/
├── index.html              # Main web interface
├── generate.php            # QR code generation endpoint
├── composer.json           # PHP dependencies
├── generated_qr_codes/     # Output directory
└── vendor/                 # Composer packages
    └── endroid/
        └── qr-code/        # QR code library
```

### API Endpoint

**POST** `/generate.php`

**Parameters:**
- `text` (string, required) - Content to encode
- `size` (int, optional) - QR code size (100-1000, default: 300)
- `format` (string, optional) - Output format (svg, default: svg)
- `foreground` (string, optional) - Foreground color (hex, default: #000000)
- `background` (string, optional) - Background color (hex, default: #ffffff)

**Response:**
```json
{
  "success": true,
  "qr_code": "generated_qr_codes/qr_123456.svg",
  "format": "svg",
  "size": 300,
  "text": "Hello World!"
}
```

---

## 🎨 Customization

### Colors
The interface uses CSS custom properties for easy theming:

```css
:root {
  --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  --background-color: #ffffff;
  --text-color: #333333;
}
```

### QR Code Settings
Modify `generate.php` to adjust:
- Error correction level
- Margin size
- Encoding format
- Block size mode

---

## 🚀 Performance

- **Lightweight** - No heavy image processing libraries
- **Fast generation** - SVG format is efficient
- **Scalable** - Vector graphics scale perfectly
- **Cached** - Generated files are saved for reuse

---

## 🤝 Contributing

We welcome contributions! Please see our [Contributing Guidelines](CONTRIBUTING.md) for details.

### Development Setup
```bash
# Install dependencies
composer install

# Run tests
php vendor/bin/phpunit

# Start development server
php -S localhost:8000
```

---

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## 🙏 Acknowledgments

- [Endroid QR Code](https://github.com/endroid/qr-code) - PHP QR code library
- [Bacon QR Code](https://github.com/Bacon/BaconQrCode) - QR code generation engine
- [Composer](https://getcomposer.org/) - Dependency management

---

## 📞 Support

- **Issues**: [GitHub Issues](https://github.com/your-username/qrgenerator/issues)
- **Discussions**: [GitHub Discussions](https://github.com/your-username/qrgenerator/discussions)
- **Email**: support@your-domain.com

---

<div align="center">

**Made with ❤️ by [Your Name](https://github.com/your-username)**

[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/your-username)
[![Twitter](https://img.shields.io/badge/Twitter-1DA1F2?style=for-the-badge&logo=twitter&logoColor=white)](https://twitter.com/your-username)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://linkedin.com/in/your-username)

</div>
