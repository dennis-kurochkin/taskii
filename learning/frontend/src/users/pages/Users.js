import React from 'react';
import UsersList from '../components/UsersList';

const Users = () => {
  const USERS = [
    // {
    //   id: 1,
    //   image: 'https://picsum.photos/200/300',
    //   name: 'User1',
    //   places: 1,
    // },
    // {
    //   id: 2,
    //   image: 'https://picsum.photos/300/300',
    //   name: 'Dennis',
    //   places: 10,
    // }
  ];

  return (
    <UsersList items={USERS} />
  );
}

export default Users;