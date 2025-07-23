#!/bin/bash

echo "🚀 Iniciando processo de versionamento..."

# Inicializa repositório se não existir
if [ ! -d ".git" ]; then
    echo "📁 Inicializando repositório Git..."
    git init
else
    echo "✅ Repositório Git já inicializado."
fi

git add .
git commit -m "Versão inicial do sistema de acompanhamento escolar (sis)"
git branch -M main

# Verifica se o remote já existe
if git remote | grep -q origin; then
    echo "🔗 Remote 'origin' já existe."
else
    git remote add origin https://github.com/pauloheg33/sis.git
    echo "🔗 Remote 'origin' adicionado."
fi

# Tenta fazer o push com orientação
echo "📤 Enviando para o GitHub..."
git push origin main || {
    echo "❌ Push falhou. Execute manualmente:"
    echo "   git pull origin main --allow-unrelated-histories"
    echo "   git push origin main"
}
