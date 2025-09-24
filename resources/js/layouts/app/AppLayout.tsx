import MainNavbar from '@/layouts/app/MainNavbar';

type AppLayoutProps = {
  children: React.ReactNode;
};

const AppLayout = ({ children }: AppLayoutProps) => {
  return (
    <>
      <header>
        <MainNavbar />
      </header>
      <main>{children}</main>
    </>
  );
};

export default AppLayout;
