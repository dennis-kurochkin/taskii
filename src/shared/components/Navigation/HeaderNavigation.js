import React from 'react';
import { Link } from 'react-router-dom';

import { Header, Icon, Container, Grid } from 'semantic-ui-react';

const HeaderNavigation = () => {
    return (
        <Container style={{ padding: '25px 0' }}>
            <Link to="/">
                <Header as='h2'>
                    <Icon name='tasks' />
                    <Header.Content>
                        Taskii
                        <Header.Subheader>Такс-менеджер веб-студии A7</Header.Subheader>
                    </Header.Content>
                </Header>
            </Link>
        </Container>
    );
}

export default HeaderNavigation;