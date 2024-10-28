// Função para buscar usuários do localStorage
function getUsers() {
    return JSON.parse(localStorage.getItem('users')) || [];
}

// Função para salvar usuários no localStorage
function saveUsers(users) {
    localStorage.setItem('users', JSON.stringify(users));
}

// Função para renderizar a lista de usuários
function renderUserList() {
    const userList = document.getElementById('userList');
    userList.innerHTML = '';

    const users = getUsers();
    users.forEach((user, index) => {
        const row = document.createElement('tr');

        row.innerHTML = `
            <td>${user.name}</td>
            <td>${user.email}</td>
            <td>
                <button onclick="editUser(${index})">Editar</button>
                <button class="delete-btn" onclick="deleteUser(${index})">Excluir</button>
            </td>
        `;

        userList.appendChild(row);
    });
}

// Função para adicionar um novo usuário
function addUser(event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    const users = getUsers();
    users.push({ name, email, password });
    saveUsers(users);

    document.getElementById('userForm').reset();
    renderUserList();
}

// Função para deletar um usuário
function deleteUser(index) {
    const users = getUsers();
    users.splice(index, 1);
    saveUsers(users);
    renderUserList();
}

// Função para editar um usuário
function editUser(index) {
    const users = getUsers();
    const user = users[index];

    document.getElementById('name').value = user.name;
    document.getElementById('email').value = user.email;
    document.getElementById('password').value = user.password;

    // Atualizar o formulário para edição
    document.getElementById('userForm').onsubmit = function (event) {
        event.preventDefault();

        user.name = document.getElementById('name').value;
        user.email = document.getElementById('email').value;
        user.password = document.getElementById('password').value;

        users[index] = user;
        saveUsers(users);

        document.getElementById('userForm').reset();
        renderUserList();

        // Voltar o formulário para o comportamento de cadastro
        document.getElementById('userForm').onsubmit = addUser;
    };
}

// Carregar a lista de usuários quando a página é carregada
document.getElementById('userForm').onsubmit = addUser;
renderUserList();