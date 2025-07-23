#!/bin/bash

# Script de deploy inicial no GitHub

echo "🚀 Iniciando processo de versionamento..."

# Verifica se já é um repositório Git
if [ -d ".git" ]; then
    echo "✅ Repositório Git já inicializado."
else
    echo "📁 Inicializando repositório Git..."
    git init
fi

# Adiciona todos os arquivos
git add .

# Commit inicial
git commit -m "Versão inicial do sistema de acompanhamento escolar (sis)"

# Define a branch principal
git branch -M main

# Define o repositório remoto
git remote add origin https://github.com/pauloheg33/sis

# Faz o push inicial
git push -u origin main

echo "✅ Projeto enviado com sucesso para o GitHub!"
