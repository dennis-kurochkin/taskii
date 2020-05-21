import React from 'react';
import {
    Button,
    Form,
    Grid,
    Header,
    Segment,
} from 'semantic-ui-react';

const LoginForm = () => {
    return (
        <Grid centered columns={3} style={{ height: '100vh' }} verticalAlign='middle'>
            <Grid.Column>
                <Header as="h2" textAlign="center">
                    Войти в Taskii
                 </Header>
                <Segment>
                    <Form size="large">
                        <Form.Input
                            fluid
                            icon="user"
                            iconPosition="left"
                            placeholder="E-mail"
                        />
                        <Form.Input
                            fluid
                            icon="lock"
                            iconPosition="left"
                            placeholder="Пароль"
                            type="password"
                        />
                        <Button color="blue" fluid size="large">
                            Войти
                        </Button>
                    </Form>
                </Segment>
            </Grid.Column>
        </Grid>
    );
};

export default LoginForm;