@extends('layouts.dashboard-ultra')

@section('title', 'Gestion des Utilisateurs - Excellence Afrik')
@section('page_title', 'Gestion des Utilisateurs')

@push('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('styles')
<style>
.users-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

.users-header {
    background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
    border-radius: 1rem;
    padding: 2rem;
    margin-bottom: 2rem;
    color: #D4AF37;
    position: relative;
    overflow: hidden;
}

.users-header::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    transform: translate(50%, -50%);
}

.users-header h1 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    position: relative;
    z-index: 1;
}

.users-header p {
    font-size: 1.1rem;
    opacity: 0.9;
    margin: 0;
    position: relative;
    z-index: 1;
}

.users-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    margin-bottom: 2rem;
}

.card-header {
    background: #f8f9fa;
    padding: 1.5rem;
    border-bottom: 1px solid #e9ecef;
    display: flex;
    justify-content: between;
    align-items: center;
}

.card-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #212529;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-add {
    background: linear-gradient(135deg, #D4AF37, #b8941f);
    color: #000;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-add:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(212, 175, 55, 0.3);
    color: #000;
    text-decoration: none;
}

.table {
    margin: 0;
}

.table th {
    background: #f8f9fa;
    border-bottom: 2px solid #e9ecef;
    color: #495057;
    font-weight: 600;
    padding: 1rem;
}

.table td {
    padding: 1rem;
    vertical-align: middle;
    border-bottom: 1px solid #e9ecef;
}

.user-avatar {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #D4AF37, #b8941f);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    color: white;
    margin-right: 1rem;
}

.user-info {
    display: flex;
    align-items: center;
}

.user-details h6 {
    margin: 0;
    font-weight: 600;
    color: #212529;
}

.user-details small {
    color: #6c757d;
}

.badge {
    padding: 0.5rem 1rem;
    border-radius: 1rem;
    font-size: 0.875rem;
    font-weight: 500;
}

.badge-admin {
    background: #dc354520;
    color: #dc3545;
}

.badge-directeur {
    background: #fd7e1420;
    color: #fd7e14;
}

.badge-journaliste {
    background: #0d6efd20;
    color: #0d6efd;
}

.status-active {
    color: #10b981;
}

.status-inactive {
    color: #6c757d;
}

.btn-group .btn {
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
}

.modal-content {
    border-radius: 1rem;
    border: none;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
}

.modal-header {
    background: #f8f9fa;
    border-bottom: 1px solid #e9ecef;
    border-radius: 1rem 1rem 0 0;
}

.form-label {
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.5rem;
}

.form-label.required::after {
    content: ' *';
    color: #ef4444;
}

.form-control, .form-select {
    border: 2px solid #e5e7eb;
    border-radius: 0.5rem;
    padding: 0.75rem;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    outline: none;
    border-color: #D4AF37;
    box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
}

.alert {
    border-radius: 0.5rem;
    padding: 1rem;
    margin-bottom: 1rem;
}

@media (max-width: 768px) {
    .users-container {
        padding: 1rem;
    }

    .table-responsive {
        font-size: 0.875rem;
    }

    .btn-group {
        flex-direction: column;
    }
}
</style>
@endpush

@section('content')
<div class="users-container">
    <!-- Header -->
    <div class="users-header">
        <h1>
            <i class="fas fa-users me-2"></i>
            Gestion des Utilisateurs
        </h1>
        <p>Administrez les comptes et permissions des utilisateurs</p>
    </div>

    <!-- Messages d'alerte -->
    <div id="alertContainer"></div>

    <!-- Card principale -->
    <div class="users-card">
        <div class="card-header">
            <h2 class="card-title">
                <i class="fas fa-list"></i>
                Liste des Utilisateurs
            </h2>
            <button class="btn-add" data-bs-toggle="modal" data-bs-target="#createUserModal">
                <i class="fas fa-plus"></i>
                Ajouter un utilisateur
            </button>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Rôle</th>
                        <th>Statut</th>
                        <th>Date création</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody">
                    <!-- Les utilisateurs seront chargés ici -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Créer Utilisateur -->
<div class="modal fade" id="createUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Créer un nouvel utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="createUserForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="createName" class="form-label required">Nom complet</label>
                        <input type="text" class="form-control" id="createName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="createEmail" class="form-label required">Email</label>
                        <input type="email" class="form-control" id="createEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="createPassword" class="form-label required">Mot de passe</label>
                        <input type="password" class="form-control" id="createPassword" name="password" required minlength="8">
                        <small class="text-muted">Minimum 8 caractères</small>
                    </div>
                    <div class="mb-3">
                        <label for="createRole" class="form-label required">Rôle</label>
                        <select class="form-select" id="createRole" name="role_utilisateur" required>
                            <option value="">Sélectionner un rôle</option>
                            <option value="admin">Administrateur</option>
                            <option value="directeur_publication">Directeur de Publication</option>
                            <option value="journaliste">Journaliste</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="createActive" name="est_actif" checked>
                            <label class="form-check-label" for="createActive">
                                Compte actif
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Créer l'utilisateur</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Modifier Utilisateur -->
<div class="modal fade" id="editUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier l'utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editUserForm">
                <input type="hidden" id="editUserId" name="user_id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editName" class="form-label required">Nom complet</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label required">Email</label>
                        <input type="email" class="form-control" id="editEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPassword" class="form-label">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="editPassword" name="password" minlength="8">
                        <small class="text-muted">Laisser vide pour ne pas changer</small>
                    </div>
                    <div class="mb-3">
                        <label for="editRole" class="form-label required">Rôle</label>
                        <select class="form-select" id="editRole" name="role_utilisateur" required>
                            <option value="admin">Administrateur</option>
                            <option value="directeur_publication">Directeur de Publication</option>
                            <option value="journaliste">Journaliste</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="editActive" name="est_actif">
                            <label class="form-check-label" for="editActive">
                                Compte actif
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Modifier l'utilisateur</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Variables globales
let users = [];

// Initialisation
document.addEventListener('DOMContentLoaded', function() {
    loadUsers();
    setupForms();
});

// Charger la liste des utilisateurs
function loadUsers() {
    fetch('/dashboard/settings/users')
        .then(response => response.json())
        .then(data => {
            if (data.users) {
                users = data.users;
                displayUsers();
            }
        })
        .catch(error => {
            console.error('Erreur lors du chargement:', error);
            showAlert('Erreur lors du chargement des utilisateurs', 'danger');
        });
}

// Afficher les utilisateurs dans le tableau
function displayUsers() {
    const tbody = document.getElementById('usersTableBody');
    tbody.innerHTML = '';

    users.forEach(user => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>
                <div class="user-info">
                    <div class="user-avatar">
                        ${user.name.charAt(0).toUpperCase()}
                    </div>
                    <div class="user-details">
                        <h6>${user.name}</h6>
                        <small>${user.email}</small>
                    </div>
                </div>
            </td>
            <td>
                <span class="badge ${getRoleBadgeClass(user.role_utilisateur)}">
                    ${getRoleLabel(user.role_utilisateur)}
                </span>
            </td>
            <td>
                <span class="${user.est_actif ? 'status-active' : 'status-inactive'}">
                    <i class="fas ${user.est_actif ? 'fa-check-circle' : 'fa-times-circle'}"></i>
                    ${user.est_actif ? 'Actif' : 'Inactif'}
                </span>
            </td>
            <td>${new Date(user.created_at).toLocaleDateString('fr-FR')}</td>
            <td>
                <div class="btn-group" role="group">
                    <button class="btn btn-outline-primary btn-sm" onclick="editUser(${user.id})">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-outline-danger btn-sm" onclick="deleteUser(${user.id})">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Obtenir la classe CSS pour le badge de rôle
function getRoleBadgeClass(role) {
    switch (role) {
        case 'admin': return 'badge-admin';
        case 'directeur_publication': return 'badge-directeur';
        case 'journaliste': return 'badge-journaliste';
        default: return 'badge-secondary';
    }
}

// Obtenir le label pour le rôle
function getRoleLabel(role) {
    switch (role) {
        case 'admin': return 'Administrateur';
        case 'directeur_publication': return 'Directeur';
        case 'journaliste': return 'Journaliste';
        default: return role;
    }
}

// Configuration des formulaires
function setupForms() {
    // Formulaire de création
    document.getElementById('createUserForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        // Gérer le checkbox est_actif
        const isActive = document.getElementById('createActive').checked;
        formData.set('est_actif', isActive ? '1' : '0');

        fetch('/dashboard/settings/users', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                bootstrap.Modal.getInstance(document.getElementById('createUserModal')).hide();
                loadUsers();
                showAlert('Utilisateur créé avec succès', 'success');
                this.reset();
            } else {
                let errorMsg = data.message || 'Erreur inconnue';
                if (data.errors) {
                    const errorList = Object.values(data.errors).flat().join(', ');
                    errorMsg += ': ' + errorList;
                }
                showAlert(errorMsg, 'danger');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            showAlert('Erreur lors de la création', 'danger');
        });
    });

    // Formulaire de modification
    document.getElementById('editUserForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const userId = document.getElementById('editUserId').value;

        // Gérer le checkbox est_actif
        const isActive = document.getElementById('editActive').checked;
        formData.set('est_actif', isActive ? '1' : '0');

        fetch(`/dashboard/settings/users/${userId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                bootstrap.Modal.getInstance(document.getElementById('editUserModal')).hide();
                loadUsers();
                showAlert('Utilisateur modifié avec succès', 'success');
            } else {
                let errorMsg = data.message || 'Erreur inconnue';
                if (data.errors) {
                    const errorList = Object.values(data.errors).flat().join(', ');
                    errorMsg += ': ' + errorList;
                }
                showAlert(errorMsg, 'danger');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            showAlert('Erreur lors de la modification', 'danger');
        });
    });
}

// Modifier un utilisateur
function editUser(userId) {
    const user = users.find(u => u.id === userId);
    if (!user) return;

    document.getElementById('editUserId').value = user.id;
    document.getElementById('editName').value = user.name;
    document.getElementById('editEmail').value = user.email;
    document.getElementById('editPassword').value = '';
    document.getElementById('editRole').value = user.role_utilisateur;
    document.getElementById('editActive').checked = user.est_actif;

    new bootstrap.Modal(document.getElementById('editUserModal')).show();
}

// Supprimer un utilisateur
function deleteUser(userId) {
    const user = users.find(u => u.id === userId);
    if (!user) return;

    if (confirm(`Êtes-vous sûr de vouloir supprimer l'utilisateur "${user.name}" ?`)) {
        fetch(`/dashboard/settings/users/${userId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadUsers();
                showAlert('Utilisateur supprimé avec succès', 'success');
            } else {
                showAlert('Erreur: ' + data.message, 'danger');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            showAlert('Erreur lors de la suppression', 'danger');
        });
    }
}

// Afficher une alerte
function showAlert(message, type) {
    const alertContainer = document.getElementById('alertContainer');
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;

    alertContainer.appendChild(alertDiv);

    // Auto-remove after 5 seconds
    setTimeout(() => {
        if (alertDiv.parentNode) {
            alertDiv.remove();
        }
    }, 5000);
}
</script>
@endpush