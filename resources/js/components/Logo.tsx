type LogoProps = {
  size?: 'xs' | 'sm' | 'md' | 'lg' | 'xl' | '2xl' | '3xl' | '4xl' | '5xl' | '6xl' | '7xl' | '8xl' | '9xl';
};

const Logo = ({ size = '4xl' }: LogoProps) => {
  return (
    <div className={`text-${size} bg-linear-135 from-[#1a365d] via-[#ff6b35] to-[#7877c6] bg-clip-text font-black text-transparent`}>AuraTech</div>
  );
};

export default Logo;
